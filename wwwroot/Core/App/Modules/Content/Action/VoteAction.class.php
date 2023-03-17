<?php
/**
 * 投票系统
 */
class VoteAction extends GlobalAction {	
	
	
	/* 首页 */
	public function admin() {
		
		if($this->isGet()){		    
		
			$tpl = __DIR__.'/../Tpl/Default/Vote/index.php';		
			
			$this->display($tpl);	
		}
	}
	
	/* 编辑活动相关 */
	public function edit() {
		
		if($this->isGet()){
		
		    $id= intval($_GET['act_id']);	
            $act_name= trim($_GET['act_name']);			
			
			$tpl = __DIR__.'/../Tpl/Default/Vote/edit.php';
			$this->assign('act_id',$id);
			$this->assign('act_name',$act_name);
			
			$this->display($tpl);			
		
		}
	}
	
	/* 入围公司相关 */
	public function award(){
		
		if($this->isGet()){
		    
			$act_id = intval($_GET['act_id']);
		    $award_id = intval($_GET['award_id']);
			$award_name = trim($_GET['award_name']);
			
			$Model = new Model();
			
			/* 入围公司 this is a test txt which is selected from */
			$sql = 'select ve.qy_name,ve.logo_url,ae.id,ae.enterp_id,ae.enterp_advant,ae.award_votes from h_award_enterp as ae left join h_vote_enterp ve on ve.id=ae.enterp_id where ae.award_id='.$award_id;
			
			$datas = $Model->query($sql);
			
			$ent1 = '';
			if($datas){
				/* 未入围 */
				$ent='(';
				foreach($datas as $v){
					$ent.=$v['enterp_id'].',';
					
				}
				$ent1 = ' and id not in '.rtrim($ent,',').')';
			}			
			
			$sql1 = 'select id,qy_name,logo_url from h_vote_enterp where activity_id='.$act_id.$ent1;
			
			$datas_not = $Model->query($sql1);
			
			
			
		
		    $tpl = __DIR__.'/../Tpl/Default/Vote/award_enterp.php';
			$this->assign('award_id',$award_id);
			$this->assign('award_name',$award_name);
			$this->assign('datas',$datas);
			$this->assign('datas_not',$datas_not);
			
			$this->display($tpl);		
		
		}
		
	}
	
	
	
	
	
	public function deal(){
		
		if($this->isPost()){
			
			$type = $_POST['type'];
			$award = M('Vote_activity_award');
			
			if($type == 'add_award' || $type == 'edit_award')
			{
				
				if($type =='add_award')
				{
					$award_name = trim($_POST['award_name']);
					$act_id = intval($_POST['act_id']);				
					
					$data['award_name'] = $award_name;
					$data['activity_id']= $act_id;
					
					$in = $award->add($data);
					
					$res=array(
						'msg' =>'新增失败'
					);
					if($in>=1)
					{
						$res['msg'] = '新增成功';
					}
					
				}
				else if($type =='edit_award')
				{
					$award_name = trim($_POST['award_name']);
					$award_id = intval($_POST['award_id']);	
                    $act_id = intval($_POST['act_id']);					
					
					$data['award_name'] = $award_name;					
					
					$up = $award->where(array('id'=>$award_id))->save($data);
					
					$res=array(
						'msg' =>'编辑失败'
					);
					if($up>=1)
					{
						/* 已评选公司的相关信息修改 */
						$vote_info = M('Award_enterp');
						$data1=array(
							'award_name'=>$award_name					
						);
						$up_vote_info = $vote_info->where(array('award_id'=>$award_id,'activity_id'=>$act_id))
									   ->save($data1);
						if($up_vote_info>=1)			   
						$res['msg'] = '编辑成功';
					}
					
				}
				
				
				echo json_encode($res);
				
			}
			else if($type =='edit_enterp'){
					
					$ent_id = intval($_POST['ent_id']);
					$qy_name = trim($_POST['qy_name']);	
                  				
					
					$data['qy_name'] = $qy_name;	
					
                    $ent = M('Vote_enterp');					
					
					$up = $ent->where(array('id'=>$ent_id))->save($data);
					
					$res=array(
						'msg' =>'未修改'
					);
					
					if($up>=1)
				    $res['msg'] = '编辑成功';	
				
				    echo json_encode($res);
			}
			else if($type =='add_enterp'){
					
					$act_id = intval($_POST['act_id']);
					$qy_name = trim($_POST['qy_name']);	
            
                    $logo_url  = trim($_POST['logo_url']);						
					
					$data['qy_name'] = $qy_name;	
					
					$data['logo_url'] = $logo_url;
					$data['create_time'] = time();
					$data['activity_id'] = $act_id;
					
                    $ent = M('Vote_enterp');					
					
					$add = $ent->add($data);
					
					$res=array(
						'msg' =>'失败'
					);
					
					if($add>=1)
				    $res['msg'] = '新增成功';	
				
				    echo json_encode($res);
			}
			
			else if($type == 'add_award_enterp'){
				
				$ent_id = intval($_POST['ent_id']);
				$award_id = intval($_POST['award_id']);
				$ent_reason = trim($_POST['reason']);
				$votes = intval($_POST['votes']);
				
				$model = new Model();
				$sql = 'select val.id,val.activity_name,vaa.award_name from h_vote_activity_award vaa left join h_vote_activity_lists val on val.id=vaa.activity_id where vaa.id='.$award_id;
				$info = $model->query($sql);
				
				$info = $info[0];
				
				$data['award_id'] = $award_id;
				$data['enterp_id'] = $ent_id;
				$data['activity_id'] = $info['id'];
				$data['award_name'] = $info['award_name'];
				$data['activity_name'] = $info['activity_name'];
				$data['enterp_advant'] = $ent_reason;
				$data['award_votes'] = $votes;
				
				$award_ent = M('Award_enterp');
				$in = $award_ent->add($data);
				
				$res=array(
					'msg' =>'失败'
				);
					
					if($in>=1)
				    $res['msg'] = '新增成功';	
				
				echo json_encode($res);
				
			}
			
			else if($type == 'del_award_enterp'){
				
				$award_ent_id = intval($_POST['award_ent_id']);
				
				$award_enterp = M('Award_enterp');				
				
				$del = $award_enterp->where(array('id'=>$award_ent_id))->delete();
				
				$res=array(
						'msg' =>'失败'
					);
					
					if($del>=1)
				    $res['msg'] = '删除成功';	
				
				    echo json_encode($res);
				
			}
			
			else if($type == 'edit_award_enterp'){
				
				$award_ent_id = intval($_POST['award_ent_id']);
				$ent_reason = trim($_POST['reason']);
				$votes = intval($_POST['votes']);
				
				$award_enterp = M('Award_enterp');				
				
				$data['enterp_advant'] = $ent_reason;
				$data['award_votes'] = $votes;
				
				$up = $award_enterp->where(array('id'=>$award_ent_id))->save($data);
				
				$res=array(
						'msg' =>'失败'
					);
					
				if($up>=1)
				$res['msg'] = '编辑成功';	
				
				echo json_encode($res);
				
			}
			
			else if($type == 'del_enterp'){
								
				$ent_id = intval($_POST['ent_id']);
				$act_id = intval($_POST['act_id']);
				
				$award_enterp = M('Award_enterp');	
                $enterp = M('Vote_enterp');	
                
                $del_ent = $enterp->where(array('id'=>$ent_id))->delete();					
				
				$res=array(
						'msg' =>'失败'
					);
					
					if($del_ent>=1)
					{
						$del = $award_enterp->where(array('enterp_id'=>$ent_id,'activity_id'=>$act_id))->delete();
						if($del>=1)
						$res['msg'] = '删除成功';	
					}
				    
				
				    echo json_encode($res);
				
				
			}
			
			
			
			
		}		
		
	}
	
	public function upload(){
		
		if($this->isPost()){
		
		   $file = $_FILES;		   
		   
		   $tmp_name = $file['file']['tmp_name'];	
           $old_name = $file['file']['name'];	

           $exts = explode('.',$old_name);
           $ext = $exts[count($exts) - 1]; 	
		   
		   $date_dir = date('Ymd',time());
		   $pan = 'D:/WebData/tongwei2018/wwwroot';
		   $dir = '/static/votes/'.$date_dir;
		   $new_file = '/'.time().'.'.$ext;
		   
		   if(!is_dir($pan.$dir)){
			 
			  mkdir($pan.$dir,0777,true);
		   }		   
		
		   $if = move_uploaded_file($tmp_name,$pan.$dir.$new_file);	 
		   
		   $res=array(
		      'code' =>0,
			  'msg' =>'上次失败',
			  'url'=>''
		   );
		  
		   if($if)
		   {
			   $res['code'] =1;
			   $res['msg'] ='上传成功';
			   $res['url'] = $dir.$new_file;
		   }
	       
		   echo json_encode($res);
		   
		}
		
	}
	
	
	/* 公司相关 */
	public function enterp(){
		
		if($this->isGet()){
		    
			if(isset($_GET['act_id'])&&$_GET['act_id']>0)
		    {
				
				$act_id = intval($_GET['act_id']);	
                $act_name = trim($_GET['act_name']);					
					
				$this->assign('act_id',$act_id);
				$this->assign('act_name',$act_name);
					
				$tpl = __DIR__.'/../Tpl/Default/Vote/enterp.php';
				$this->display($tpl);				
				
			}
		
		}
		
	}
	
	public function getdata() {
		
		if($this->isGet()){
			
		    if(isset($_GET['type']) && $_GET['type']!=''){
				
				$type = trim($_GET['type']);
				if($type == 'jx')
				{
					$act_id = intval($_GET['act_id']);
					
					$page = intval($_GET['page']);
					$limit = intval($_GET['limit']);
					
					$award = M('Vote_activity_award');
					$datas = $award->where(array('activity_id'=>$act_id))->select();
					
					$res=array(
						"code"=>0,
						"msg"=>'',
						"count"=> 100,
						"data"=>'',
					);
					
					$res['data']=$datas;
					
					echo json_encode($res);
					
				}
				else if($type == 'enterp'){
					
					$act_id = intval($_GET['act_id']);
					
					$page = intval($_GET['page']);
					$limit = intval($_GET['limit']);
					
					$ent = M('Vote_enterp');
					$datas = $ent->page($page,$limit)->where(array('activity_id'=>$act_id))->select();
					
					$count = $ent->where(array('activity_id'=>$act_id))->count();// 
					
					$res=array(
						"code"=>0,
						"msg"=>'',
						"count"=> $count,
						"data"=>'',
					);
					
					$res['data']=$datas;
					
					echo json_encode($res);
					
				}
				
				
			}
		    else{
				$activity = M('Vote_activity_lists');
			
				$page = intval($_GET['page']);
				$limit = intval($_GET['limit']);
				$datas = $activity->page($page,$limit)->order('create_time desc')->select();
				
				$res=array(
					"code"=>0,
					"msg"=>'',
					"count"=> 100,
					"data"=>'',
				);
				
				$res['data']=$datas;
				
				echo json_encode($res);
			}
			
		
		}
	}
	
	
	
	
	
}
?>