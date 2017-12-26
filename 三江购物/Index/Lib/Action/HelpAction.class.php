<?php
class HelpAction extends Action {
	public function helpIndex() {
		$this -> display();
	}
	public function gwznCXHD() {
		$this -> display();
	}
	public function gwznDDZT() {
		$this -> display();
	}
	public function gwznGWLC() {
		$this -> display();
	}
	public function gwznHYQY() {
		$this -> display();
	}
	public function gwznYHJ() {
		$this -> display();
	}
	public function gwznZCLC() {
		$this -> display();
	}
	public function gwznZHAQ() {
		$this -> display();
	}
	public function mdylbMDYLB() {
		$shop = M('shop');
		$list = $shop->select();
//		print_r($list);
		$this->assign("data",$list);
		$this -> display();
	}
	public function shfwCJWT() {
		$this -> display();
	}
	public function shfwHHGZ() {
		$this -> display();
	}
	public function shfwTHGZ() {
		$this -> display();
	}
	public function shfwYHFK() {
		$this -> display();
	}
	public function wlpsPSSJ() {
		$this -> display();
	}
	public function wlpsPSFS() {
		$this -> display();
	}
	public function wlpsPSFW() {
		$this -> display();
	}
	public function wlpsPSSFBZ() {
		$this -> display();
	}
	public function wlpsQSYH() {
		$this -> display();
	}
	public function wlpsZTLC() {
		$this -> display();
	}
	public function zffsCJWT() {
		$this -> display();
	}
	public function zffsHDFK() {
		$this -> display();
	}
	public function zffsTKSM() {
		$this -> display();
	}
	public function zffsZXZF() {
		$this -> display();
	}
	public function zzfwZZFW() {
		$this -> display();
	}
}
?>