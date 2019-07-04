
<h2>JavaScript Уроки</h2>
<h4>Форма добавления времени к уже существующему.</h4>
    
<div class="DIV_MAIN" id="DIV_1">
    <form name="panel_1" class="panel"  style="float:left;">
    	<p>Панель</p>
    	<input name="pan1_inp3" placeholder="Минуты">
    	<input name="pan1_inp4" placeholder="Час">
   	 	<input name="pan1_inp5" placeholder="День">
    	<input name="pan1_inp6" placeholder="Месяц"> 
    	<input name="pan1_inp7" placeholder="Год">

    	<div onclick="func_1pan(true)" class="panel_button">
       		Применить
    	</div>

    	<div onclick="func_1pan(false)" class="panel_button">
        	Отмена
   		</div>
	</form>
    
    <div  class="panel"  style="float:left; width: 160px;">
    	<p>Реальное время</p>
    	<p id="p_res_1" style="text-align: left;"></p>
	</div>

    <div  class="panel"  style="float:left;width: 200px;">
    	<p>Установленное время</p>
   		<p id="p_res_2" style="text-align: left;"></p>
	</div>

</div>
    



<script type="text/javascript">
    "use strict";
//-----------------------------------------------------//
    // Переменные для работы со временем
    var res1 = document.getElementById("p_res_1");
    var res2 = document.getElementById("p_res_2");
    setInterval(func_Setime,1);
    
    var Time = new Date();
                 
    var min_t = Time.getMinutes();
    var hour_t = Time.getHours();
    var day_t = Time.getDate();
    var month_t = Time.getMonth();
    var year_t = Time.getFullYear();
    var flag_1 = true;
    
    // Флаг с выбором какую функцию выбрать для работы
    function func_1pan(bool_v){
        if(bool_v==true){
            func_1pan_ok();
        }else{
            func_1pan_no();
        }
    }
    // Внесение изменений
    function func_1pan_ok(){
        if(flag_1==false){
            var Time = new Date();
             min_t = Time.getMinutes();
             hour_t = Time.getHours();
             day_t = Time.getDate();
             month_t = Time.getMonth();
             year_t = Time.getFullYear();
             flag_1=true;
        }
        
        var min_v = document.panel_1.pan1_inp3.value;
        var hour_v = document.panel_1.pan1_inp4.value;
        var day_v = document.panel_1.pan1_inp5.value;
        var month_v = document.panel_1.pan1_inp6.value;
        var year_v = document.panel_1.pan1_inp7.value;
        
        if(Number(min_v)){min_t = min_t + Number(min_v);}
        if(Number(hour_v)){hour_t = hour_t + Number(hour_v);}
        if(Number(day_v)){day_t = day_t + Number(day_v);}
        if(Number(month_v)){month_t = month_t + Number(month_v);}
        if(Number(year_v)){year_t = year_t + Number(year_v);}
        
        var i = 0; var ii =0;var iii =0; var iiii =0;
        if(min_t >= 60){
                do{min_t-60;i++}
                while(min_t<60)
                hour_t = i+hour_t;
                min_t = min_t-60;
        }
        if(hour_t >= 24){
                do{hour_t-24;ii++}
                while(hour_t<24)
                day_t = ii+day_t;
                hour_t = hour_t-24;
        }
        if(day_t >= 30){
                do{day_t-30;iii++}
                while(day_t<30)
                month_t = iii+month_t;
                day_t = day_t-30;
        }
        if(month_t >= 12){
                do{month_t-12;iiii++}
                while(month_t<12)
                year_t = iiii+year_t;
                month_t = month_t-12;
        }
        
         res2.innerHTML = "Минуты : "+min_t+"<br>Час : "+hour_t+"<br>День : "+day_t+"<br>Месяц : "+(month_t+1)+"<br>Год : "+year_t;
    }
    // Отмена изменений
    function func_1pan_no(){
        flag_1 = false;
        var Time = new Date();
        res2.innerHTML = "Минуты : "+Time.getMinutes()+"<br>Час : "+Time.getHours()+"<br>День : "+Time.getDate()+"<br>Месяц : "+(Time.getMonth()+1)+"<br>Год : "+Time.getFullYear();
    }
//-----------------------------------------------------//
    // Автоматический вывод реального времени
    function func_Setime(){
        var Time = new Date();
        res1.innerHTML = "Минуты : "+Time.getMinutes()+"<br>Час : "+Time.getHours()+"<br>День : "+Time.getDate()+"<br>Месяц : "+(Time.getMonth()+1)+"<br>Год : "+Time.getFullYear();
    }
//-----------------------------------------------------//
var div_1 = document.getElementById("DIV_1");
    
</script>







<style type="text/css"> 
    .DIV_MAIN{

    }
    #DIV_1{
        height: 400px;  
        border-radius: 10px;
        background-color: rgb(245,255,199);
        visibility: visible; 
        transition: 0.5s;
        box-shadow: 0px 0px 20px 10px rgb(43,50,56);
        border: 4px solid rgb(43,50,56); 
    }
    /*---------------------------------------*/
    .panel{
        margin: 10px;
        background-color: rgb(43,50,56); border-radius: 9px;
        width: 300px; height: auto;
        box-shadow: 5px 5px 12px 5px rgb(32,37,42);
    }
    .panel p{
        color: whitesmoke;text-align: center; padding: 10px;
    }
    .panel input{
        width: 80%; margin-left: 10%; border: 0; 
        border-radius: 6px;height: 35px; margin-top: 10px;
        background-color: rgb(59,65,72); 
        color: rgb(96,100,104); text-indent: 10px;
        font-size: 17px;
    }
     .panel input:focus{
        color: whitesmoke;
        outline: 0;
    }
    .panel_button{
        transition: 0.1s;
        background-color: rgb(0,200,250); 
        color: rgb(43,50,56);
        height: 37px;cursor: pointer;
        line-height: 37px;
        box-shadow: 0px 0px 0px 0px ;margin: 10px;
        text-align: center;border: 0px; 
        border-radius: 6px;  font-size: 18px; 
        width: 40%; margin-left: 5%; float: left;
    }
    .panel_button:hover{
          background-color: rgb(0,138,174);
    }
    .panel_button:focus{
        outline: 0;
    }
    .panel_button:active{
        color: whitesmoke;
        background: linear-gradient(rgba(0,0,0,.2), rgba(0,0,0,.1));
        box-shadow:
        inset rgba(0,0,0,.8) 0 1px 2px,
        inset rgba(0,0,0,.05) 0 -1px 0,
        #fff 0 1px 1px;
    }
    h1, h2, h3, h4, h5, h6{
		color: #171814; 
		text-align: center;
		text-shadow: 0px 0px 1px #171814;
	}
	p{ 
		color: #171814; 
		text-shadow: 0px 0px 1px #171814; 
		font-size: 18px; 
	}
	hr{
		border: 1px solid black;
	}
	pre{
		color: #FF3C4F; 
		font-size: 15px;
		text-shadow: 0px 0px 1px #FF3C4F; 
	}
    /*---------------------------------------*/
</style>