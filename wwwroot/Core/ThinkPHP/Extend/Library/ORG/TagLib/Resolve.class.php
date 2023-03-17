<?php 
/**
 * 系统模型解析
 * @author CHENG
 *
 */
import('ORG.TagLib.TagLibHandle');
class Resolve extends TagLibHandle {
	
	public function _sql() {
		/* 分页还是列表 */
		if ($this->tags['type'] == 'page') {
			/* 基本参数设置和解析过滤 */
			$this->tags['order'] = isset($this->tags['order']) ? $this->tags['order'] : 'id DESC';
			/* 获取联表对像，获取总分页数 */
			$Model = $this->tableJoin($this->tags['table']);
			$total = $Model->cache($this->tags['cache'])->where($this->tags['where'])->count(1);
			/* 分页URI设置 */
			$url = preg_replace('/([\?\&\/]page[=\/][1-9][\d]*)/', '', $_SERVER['REQUEST_URI']);
			$delimiter = strpos($url, '?')===false ? '?' : '&';
			/* 分页 */
			$Page = new Page($total,$url.$delimiter.'page={PAGE}',$this->tags['limit']);
			$data = array();
			/* 重新获取联表对像[解决同一model无法得到table的问题] */
			$Model = $this->tableJoin($this->tags['table']);
			$data['page'] = $Model->cache($this->tags['cache'])->field($this->tags['field'])->where($this->tags['where'])->order($this->tags['order'])->limit($Page->limit())->select();
			$data['pageinfo'] = $Page->show('first','prev','list','next','last');
			$data['total'] = $total;
		} else {
			/* 全能SQL，自己写SQL语句  */
			if (isset($this->tags['sql']) && !empty($this->tags['sql'])) {
				/* 安全问题，非select则过滤 */
				$this->tags['sql'] = trim($this->tags['sql']);
				if (stripos($this->tags['sql'],'select') !== 0) return ;
				/* 虽然query不缓存，但是S可以哦 */
				$cacheName = sha1($this->tags['sql']);
				$cache = S($cacheName);
				if ($cache && $this->tags['cache']) {
					$data = $cache;
				} else {
					$Model = M();
					$data = $Model->query($this->tags['sql']);
					/* 缓存 */
					if ($this->tags['cache']) S($cacheName,$data);
				}
			} else {/* //拼装 */
				/* 基本参数设置和解析过滤 */
				$this->tags['order'] = isset($this->tags['order']) ? $this->tags['order'] : 'id DESC';
				/* list方法还支持联表查询哦 */
				$resultObject = $this->tableJoin($this->tags['table']);
				$data = $resultObject->cache($this->tags['cache'])->field($this->tags['field'])->where($this->tags['where'])->order($this->tags['order'])->limit($this->tags['limit'])->select();
			}
		}
		unset($Model,$Page,$resultObject);
		return $data;
	}
	
	public function _single() {
		/* 判断是否有多表 */
		$resultObject = $this->tableJoin($this->tags['table']);
		$single = (array) $resultObject->cache((boolean)$this->tags['cache'])->where($this->tags['where'])->field($this->tags['field'])->find();
		unset($resultObject);
		return $single;
	}
	
	/**
	 * 数据表联表查询，
	 * @param string $table
	 * 返回object
	 * 支持联表查询
	 * 如果是联表则table格式为
	 * table="game AS g,game_data AS gd|gd.gid=g.id,type AS t|g.type_id=t.id"
	 * table="表名,联表1|联表条件,联表2|联表条件"
	 * return object 模型对象
	 */
	protected function tableJoin($table) {
		$table = str_ireplace('$prefix', DB_PREFIX, trim($table,','));
		$Model = M();
		if (strpos($table, ',') === false) {
			return $Model->table($table);
		} else {
			$tableArray = explode(',', $table);
			$resultObject = $Model->table($tableArray[0]);
			array_shift($tableArray);
			foreach ($tableArray as $tableValue) {
				$tableValue = explode('|',trim($tableValue,'|'));
				$resultObject = $resultObject->join("{$tableValue[0]} ON {$tableValue[1]}");
			}
			return $resultObject;
		}
	}
}
?>