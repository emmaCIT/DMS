$(document).ready(function() {
	
	var dataSource = [
	    {country: "Russia", area: 1707540},
	    {country: "Canada", area: 998467},
	    {country: "USA", area: 937261},
	    {country: "China", area: 959696},
	    {country: "Brazil", area: 854700},
	    {country: "Australia", area: 768685},
	    {country: "India", area: 328759},
	    {country: "Others", area: 554545}
	   
	   ];
		$("#chartContainer").dxPieChart({
			dataSource: dataSource,
			series: {
				argumentField: "country",
				valueField: "area"
			}
		});
		

})
	
	