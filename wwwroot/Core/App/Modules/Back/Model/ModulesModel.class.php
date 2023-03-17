<?php
/**
 * 模块操作模型
 * @author CHENG
 * 常用模型处理方法  checkData->数据验证  addData->添加数据  editData->编辑数据  deleteData->删除数据
 */
class ModulesModel extends GlobalModel {
	/**
	 * * 一次性读取所有插件，并检测是否按装
	 */
	public function getModules() {
// 		获取源目录所有文件
		$dirArray = str_replace(APP_PATH.'Modules/Modules/_src/', '', glob(APP_PATH.'Modules/Modules/_src/*'));
// 		获取所有曾经按装的数据
		$modules = $this->getField('module_dir,module_name,is_install,is_disabled,version,description,install_time,update_time,install_table');
		
		$allModules = array();
		foreach ($dirArray as $dirValue) {
			if (isset($modules[$dirValue])) {
				$modules[$dirValue]['install_time'] = date('Y-m-d H:i:s',$modules[$dirValue]['install_time']);
				$modules[$dirValue]['update_time'] = date('Y-m-d H:i:s',$modules[$dirValue]['update_time']);
			} else {
				$temp = array();
				$temp['module_name'] = '未知';
				$temp['module_dir'] = $dirValue;
				$temp['is_system'] = 2;
				$temp['is_install'] = 2;
				$temp['version'] = '未知';
				$temp['install_time'] = '未知';
				$temp['update_time'] = '未知';
				$temp['install_table'] = '未知';
				$modules[$dirValue] = $temp;
			}
		} 
		return $modules;
	}
	
	/**
	 * 模块安装
	 * @param array $config
	 * @return boolean|Ambigous <mixed, boolean, string, unknown, false, number>
	 */
	public function addData($config) {
		 $setting = array(
			'module_dir'=>(string)$config['module_dir'],
			'module_name'=>(string)$config['module_name'],
			'version'=>(string)$config['version'],
			'description'=>(string)$config['description'],
			'is_install'=>1,
			'is_disabled'=>1,
			'install_time'=>NOW_TIME,
			'update_time'=>NOW_TIME,
			'install_table'=>(string)$config['module_table'],
		);
		$status = $this->data($setting)->add(); 
		if (!$status) {
			return false;
		}
		/* 写入数据成功Copy目录和文件 */
		$fileArray = glob(APP_PATH."Modules/Modules/_src/{$config['module_dir']}/*");
		$DIR = new Dir('');
		foreach ($fileArray as $fileValue) {
			$value = basename(strtolower($fileValue));
			if ($value == 'install') continue;
			$valueDir = ucfirst($value);
			$filePath = glob($fileValue.'/*');
			foreach ($filePath as $filePathValue) {
				if ($value == 'tpl' || $value == 'conf') {
					$tplTheme = $value == 'tpl' ? C('DEFAULT_THEME').'/' : '';
					file_exists(APP_PATH."Modules/Modules/$valueDir/{$tplTheme}{$config['module_dir']}") || Tool::mkDir(APP_PATH."Modules/Modules/$valueDir/{$tplTheme}{$config['module_dir']}");
					if (is_dir($filePathValue)) {
						$DIR->copyDir($filePathValue, APP_PATH."Modules/Modules/$valueDir/".$tplTheme.basename($filePathValue));
					} else {
						copy($filePathValue, APP_PATH."Modules/Modules/$valueDir/{$tplTheme}{$config['module_dir']}/".basename($filePathValue));
					}
				} elseif ($value == 'taglib') {
					copy($filePathValue, EXTEND_PATH.'Driver/TagLib/'.basename($filePathValue));
				} elseif ($value == 'taglibhandle') {
					copy($filePathValue, LIBRARY_PATH.'ORG/TagLib/'.basename($filePathValue));
				}  
				else {
					$valueDir = strtoupper($valueDir);
					file_exists(APP_PATH."Modules/Modules/$valueDir/") || Tool::mkDir(APP_PATH."Modules/Modules/$valueDir/");
					copy($filePathValue, APP_PATH."Modules/Modules/$valueDir/".basename($filePathValue));
				}
			}
		}
		return $status;
	}
	
	/**
	 * 取出并拆分SQL
	 * @param string $moduleDir
	 */
	public function splitSql($sqlPath) {
		$sql = trim(file_get_contents($sqlPath));
		$sql = str_replace(array('$prefix',"\r"), array($this->tablePrefix,"\n"), $sql);
		$sql = explode(";", $sql);
		$newsql = array();
		foreach ($sql as $values) {
			$tempSql = '';
			$sqlArray = explode("\n",trim($values));
			foreach ($sqlArray as $sqlValue) {
				$sqlValue = trim($sqlValue);
				if (strpos($sqlValue,'-')!==false || strpos($sqlValue,'#')!==false || empty($sqlValue)) continue;
				$tempSql .= $sqlValue;
			}
			
			if(empty($tempSql)) continue ;
			
			$tempSql .= ';';
			$newsql[] = $tempSql;
		}
		foreach ($newsql as $table) {
			$status = $this->execute($table);
			if ($status === false) return false;
		}
		return  true;
	}
	
	/**
	 * 模块删卸载(non-PHPdoc)
	 * @see Model::delete()
	 * @param $module_dir 模块名称
	 */
	public function deleteData($moduleDir) {
		$moduleData = $this->where("module_dir='$moduleDir'")->find();
		$status = parent::where("module_dir='$moduleDir'")->delete();
		if ($status) {
			//删除节点
			$likeName = APP_NAME.'/Modules/'.$moduleDir;
			M('AdminRule')->where("name LIKE '$likeName%'")->delete();
			//删除数据表
			$installTable = explode(',', $moduleData['install_table']);
			foreach ($installTable as $tableName) {
				$this->dropTable(strtolower($tableName));
			}
			//删除程序文件和目录
			
			$ORG = glob(APP_PATH."Modules/Modules/ORG/$moduleDir*");
			foreach ($ORG as $aValue) {unlink($aValue);}
			
			$Action = glob(APP_PATH."Modules/Modules/Action/$moduleDir*");
			foreach ($Action as $aValue) {unlink($aValue);}
			
			$Model = glob(APP_PATH."Modules/Modules/Model/$moduleDir*");
 			foreach ($Model as $aValue) {unlink($aValue);}
 			
 			$theme = C('DEFAULT_THEME') ? C('DEFAULT_THEME').'/' : '';
			$Tpl = glob(APP_PATH."Modules/Modules/Tpl/{$theme}$moduleDir/*");
			foreach ($Tpl as $aValue) {unlink($aValue);}
			rmdir(APP_PATH."Modules/Modules/Tpl/{$theme}$moduleDir");
			
			$Conf = glob(APP_PATH."Modules/Modules/Conf/$moduleDir/*");
			foreach ($Conf as $aValue) {unlink($aValue);}
			rmdir(APP_PATH."Modules/Modules/Conf/$moduleDir");
			
			//DriverTagLib
			@unlink(EXTEND_PATH."Driver/TagLib/TagLib{$moduleDir}.class.php");
			@unlink(LIBRARY_PATH."ORG/TagLib/{$moduleDir}.class.php");
		}
		return $status;
	}
}
?>