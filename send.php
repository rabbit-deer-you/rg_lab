<?php
	session_start();
	include_once( 'config.php' );
	include_once( 'saetv2.ex.class.php' );
	include_once( 'weibo_api.php' );
	if( isset($_REQUEST['weibo']) ) {
		$ret = $c->update( $_REQUEST['weibo'] );	//发送微博
		if ( isset($ret['error_code']) && $ret['error_code'] > 0 ) {
			echo "<p>发送失败，错误：{$ret['error_code']}:{$ret['error']}</p>";
            echo $c->access_token;
		} else {
       		 header("location:index.php");
        	exit();
		}
    }
?>