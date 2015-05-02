window.onload = function() {
	CanvasJS.addColorSet("greenShades", [// colorSet Array

	"#2F4F4F", "#008080", "#2E8B57", "#3CB371", "#90EE90" ]);
	var chart = new CanvasJS.Chart("chartContainer", {
		theme: "theme3",
		//colorSet : "greenShades",
		title : {
			text : "Blood Test Levels for Diagnosis of Diabetes"
		},
		animationEnabled: true,
		data : [
      {
         type: "column",
       showInLegend: true,
       dataPoints: [
                    {label: "Low", 		y: 2.7 },
                    {label: "Normal", 	y: 8.1},
                    {label: "High", 	y: 23.1}	
       ]
     }
     ]
   });
    chart.render();
  }