<?php
class TagLibLinks extends TagLibResolve {	
	protected $tags   =  array(
		'links'=>array('attr'=>'limit','level'=>1),
		'linkstype'=>array('attr'=>'limit','level'=>3),
		'linkstype_links'=>array('attr'=>'limit','level'=>3),
	);

	public function _links($attr,$content) {		
		$tag = $this->parseXmlAttr($attr,'links');
		if (!isset($tag['return']) || empty($tag['return'])) $tag['return'] = 'data';
		if (!isset($tag['tag']) || empty($tag['tag'])) $tag['tag'] = 'foreach';
		//$tag['type'] = !empty($tag['type']) ? intval($tag['type']) : 0;
		$tag['position'] = $tag['position'] ? $tag['position'] : 1;
		if (!isset($tag['order']) || empty($tag['order'])) $tag['order'] = 'sort DESC,ID ASC';
		if (!isset($tag['cache']) || empty($tag['cache']) || strtolower($tag['cache']) == 'false') $tag['cache'] = false;//缓存
		$Link = M('Link');
		if($tag['typeid']) $typewhere = 'type_id='.$tag['typeid'].' AND ';
		//$type = $this->autoBuildVar($tag['type']);
		//print_r($type);
		$data = $Link->where("{$typewhere} link_pos={$tag['position']} AND l_status=1")->order($tag['order'])->limit(intval($tag['limit']))->field('web_name,web_url,web_logo')->select();
		$resolve_string = Tool::arrayPrototype($data);		
		unset($Link,$data);
		//处理return标识
		$tag['return'] = $this->handleReturn($tag['return']);
		$resolve_string = "<?php  \${$tag['return']['return']}=$resolve_string;  ?>";
		return $resolve_string .= $this->addForeach($tag['return'], $content, $tag['tag']);
	}
	
	public function _linkstype($attr,$content) {		
		$tag = $this->parseXmlAttr($attr,'linkstype');
		if (!isset($tag['return']) || empty($tag['return'])) $tag['return'] = 'data';
		if (!isset($tag['tag']) || empty($tag['tag'])) $tag['tag'] = 'foreach';
		if (!isset($tag['order']) || empty($tag['order'])) $tag['order'] = 'sort DESC,id ASC';
		if (!isset($tag['cache']) || empty($tag['cache']) || strtolower($tag['cache']) == 'false') $tag['cache'] = false;//缓存
		$Link = M('link_type');
		$data = $Link->where()->cache($tag['cache'])->order($tag['order'])->limit(intval($tag['limit']))->select();
		$resolve_string = Tool::arrayPrototype($data);
		unset($Link,$data);
		//处理return标识
		$tag['return'] = $this->handleReturn($tag['return']);
		$resolve_string = "<?php  \${$tag['return']['return']}=$resolve_string;  ?>";
		return $resolve_string .= $this->addForeach($tag['return'], $content, $tag['tag']);
	}
	
	public function _linkstype_links($attr,$content) {		
		$tag = $this->parseXmlAttr($attr,'linkstype');
		if (!isset($tag['return']) || empty($tag['return'])) $tag['return'] = 'data';
		if (!isset($tag['tag']) || empty($tag['tag'])) $tag['tag'] = 'foreach';
		if (!isset($tag['order']) || empty($tag['order'])) $tag['order'] = 'sort DESC,id ASC';
		if (!isset($tag['cache']) || empty($tag['cache']) || strtolower($tag['cache']) == 'false') $tag['cache'] = false;//缓存
		$tag['linkslimit'] = $tag['linkslimit'] ? $tag['linkslimit'] : 20;
		$tag['position'] = $tag['position'] ? $tag['position'] : 1;
		$link_type = M('link_type');
		$link = M('link');
		$data = $link_type->where()->cache($tag['cache'])->order($tag['order'])->limit(intval($tag['limit']))->select();
		foreach($data as $k=>$v){
			$data[$k]['links'] = $link->where("type_id={$v['id']} AND link_pos={$tag['position']} AND l_status=1")->order($tag['order'])->limit(intval($tag['linkslimit']))->select();
		}
		$resolve_string = Tool::arrayPrototype($data);
		unset($Link,$data);
		//处理return标识
		$tag['return'] = $this->handleReturn($tag['return']);
		$resolve_string = "<?php  \${$tag['return']['return']}=$resolve_string;  ?>";
		return $resolve_string .= $this->addForeach($tag['return'], $content, $tag['tag']);
	}
}
?>