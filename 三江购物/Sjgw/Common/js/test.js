function(tp,tw){
	if(tp>=88&&tw<=10){
		return 0;
	}
	if(tp>=176&&tw<=20){
		return 0;
	}
	if(tp<50){
		return 10+(tw-5)>10 ? 10+(tw-5) : 10 ;
	}
	if(tp<88&&tp>50){
		return 5+(tw-5)>5 ? 5+(tw-5) : 5;
	}
	if(tp>=176){
		return  tw - 20 ;
	}
	if(tp>=88 && tp<=176){
		return tw - 10;
	}

}