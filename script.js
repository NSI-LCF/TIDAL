setInterval(showTime, 1000);
        function showTime() {
            let time = new Date();
            let hour = time.getHours();
            let min = time.getMinutes();
            let sec = time.getSeconds();

            hour = hour < 10 ? "0" + hour : hour;
            min = min < 10 ? "0" + min : min;
            sec = sec < 10 ? "0" + sec : sec;
            
            let days=["Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"]
            
            let day=days[time.getDay()]
            
            let date=time.getDate()

            let Mois=["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"]
            
            let mois=Mois[time.getMonth()]

            let currentTime = day + " " + date + " " + mois + " " + hour + ":" 
                + min + ":" + sec;
  
            document.getElementById("heure")
                .innerHTML = currentTime;
        }
  
        showTime();




