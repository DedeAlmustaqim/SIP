function Rupiah(v){
	if(v==0){return '0,00';}
	v=parseFloat(v);
	v=v.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
	v=v.split('.').join('*').split(',').join('.').split('*').join(',');
	return v;
}

