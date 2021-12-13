setInterval(showTime, 1000);
        function showTime() {
            let time = new Date();
            let hour = time.getHours();
            let min = time.getMinutes();
            let sec = time.getSeconds();
            am_pm = "AM";
  
            if (hour > 12) {
                hour -= 12;
                am_pm = "PM";
            }
            if (hour == 0) {
                hr = 12;
                am_pm = "AM";
            }
  
            hour = hour < 10 ? "0" + hour : hour;
            min = min < 10 ? "0" + min : min;
            sec = sec < 10 ? "0" + sec : sec;
            
            let day=""

            if (time.getDay()==1){
                day="Lundi"
            } 
            if (time.getDay()==2){
                day="Mardi"
            } 
            if (time.getDay()==3){
                day="Mercredi"
            } 
            if (time.getDay()==4){
                day="Jeudi"
            } 
            if (time.getDay()==5){
                day="Vendredi"
            } 
            
            let date=time.getDate()

            let Mois=time.getMonth()
            
            if (Mois==9){
                mois="Septembre"
            }
            if (Mois==10){
                mois="Octobre"
            }
            if (Mois==11){
                mois="Novembre"
            }
            if (Mois==12){
                mois="Décembre"
            }
            if (Mois==1){
                mois="Janvier"
            }
            if (Mois==2){
                mois="Février"
            }
            if (Mois==3){
                mois="Mars"
            }
            if (Mois==4){
                mois="Avril"
            }
            if (Mois==5){
                mois="Mai"
            }
            if (Mois==6){
                mois="Juin"
            }
            if (Mois==7){
                mois="Juillet"
            }

            let currentTime = day + " " + date + " " + mois + " " + hour + ":" 
                + min + ":" + sec + am_pm;
  
            document.getElementById("date")
                .innerHTML = currentTime;
        }
  
        showTime();

