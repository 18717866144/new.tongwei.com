<?php
/**
 * 签到系统
 * @author CHEN
 *
 */
class SignAction extends GlobalAction {
	
	protected function _initialize() {
		

	}
	
	

	/**
	 * 签到页面
	 * @author
	 */
	public function index(){
		
		
		
		$this->display('sign_in');
		
	}


	/**
	 *  签到数据处理
	 *  
	 */
	public function deal(){

         if(IS_POST)
         {
            $result=array();

            $datas=I('post.');   
            
            if(!preg_match("/^1[3456789]\d{9}$/", $datas['u_phone']))
            {
                $result['msg'] = '手机号不正确';
                $result['status'] = 2;
            }
            else
            {
                $data['phone'] = $datas['u_phone'];
	            $data['name']  = $datas['u_name'];
	            $data['sign_time'] = time();

                $in= M('Sign_in')->data($data)->add();

                if($in)
                {
                	$result['msg'] = '签到成功';
                    $result['status'] = 1;
                }
                else
                {
                	$result['msg'] = '您已签到';
                    $result['status'] = 3;
                }

            }

            $this->ajaxReturn($result);   

         }                  


	}
	
	
	
}
?>