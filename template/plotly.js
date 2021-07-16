 //Dynamic “Sliding” Chart Range
 function getDatay() {
                return Math.random();
            }  
            Plotly.plot('chart',[{
                y:[getDatay()],
                type:'line'
            }]);
            
            var cnt = 0;
            setInterval(function(){
                Plotly.extendTraces('chart',{ y:[[getDatay()]]}, [0]);
                cnt++;
                if(cnt > 5) {
                    Plotly.relayout('chart',{
                        xaxis: {
                            range: [cnt-5,cnt]
                        }
                    });
                }
            },1000);
//non sliding
/**function getData() {
         return Math.random();
}
 Plotly.plot('chart',[{
        y:[getData()],
        type:'line'
}]);
 setInterval(function() {
  Plotly.extendTraces('chart', { y: [[getData()]] }, [0])
}, 200);**/