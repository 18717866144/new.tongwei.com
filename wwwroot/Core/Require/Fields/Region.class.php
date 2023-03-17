<?php
/**
 * 内容类型扩展数据字段
 * @author CHENG
 */
class Region extends Field {
	
	/* 字段显示 */
	public function show($value = '') {		
		//默认值
		$default_value = $this->setting['default_value'];		
		//输出层级
		$level = $this->setting['level'];
		$this->html = '<input type="hidden" name="info['.$this->form['field_name'].']" value="'.$value.'">';
		for($i=0;$i<$level;$i++){
			$this->html .= '<select name="'.$this->form['field_name'].'_'.$i.'" onchange="loadRegion(\''.$this->form['field_name'].'\',this.value,'.$i.')">';
			$this->html .= '<option>请选择</option>';
			$this->html .= '</select> ';
		}
		if(!defined('REGION_INIT')) {
			define('REGION_INIT', 1);
			$this->html .= '<script type="text/javascript" src="'.__PUBLIC__.'/js/region.js"></script>';
		}
$this->html .= "<script>
function loadRegion(name,val,i){
	var n = i+1;
	for(n;n<".$level.";n++){
		$('select[name=region_'+n+'] option:first').nextAll().remove();
	}
	if(i<".($level-1)."){
		$.each(region[val],function(idx,item){
			$('<option value='+item.id+'>'+item.name+'</option>').appendTo($('select[name=region_'+(i+1)+']'));
		});
	}	
	$('input[name=\"info['+name+']\"]').val(val);
}
//name名称，上级ID，当前ID，级别ID
function loadRegion2(name,pid,val,i){
	//alert(i);
	$.each(region[pid],function(idx,item){
			$('<option value='+item.id+ (item.id==val ? ' selected' :'') +'>'+item.name+'</option>').appendTo($('select[name=region_'+i+']'));
	});
}
$(function(){	
	var input = $('input[name=\"info[region]\"]');
	var val = input.val();	
	if(val){
		$.ajax({
			url:'/index.php/api/ajax/region/',
			data:{id:val},
			type:'post',
			dataType:'json',
			//boforeSend:function(){alert('数据正在提交...');},
			success:function(data){
				var i = data.data.typeid;
				for(n=0;n<=i;n++){
					var v = 'typeid_'+n;
					loadRegion2('region',data.data[v].pid,data.data[v].id,n);
				}
			},
			error:function(){alert('数据正在提交...');}
		});
		
	}else{	
		$.each(region[0],function(idx,item){
			$('<option value='+item.id+'>'+item.name+'</option>').appendTo($('select[name=region_0]'));
		});
	}	
});
</script>";
		return $this->html;
	}
	
	/* 得到字段默认长度 */
	public function getFieldLen() {
		return 5;
	}

	/* 系统内置字段样式 */
	protected function internal($value) {}
}
?>