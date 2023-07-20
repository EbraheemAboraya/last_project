window.onload = () =>{
    floor_();
    Apartments();  

    
    
    

}
    
    function floor_() {                                                 ////list of numberfloor
        for (let i = 0; i <= 30; i++) {
            let option = document.createElement("option");
            option.innerHTML = i;
            let select_list = document.getElementById("Floor_");
            select_list.appendChild(option);
        }
     }
    
    
    function Apartments() {                                            ///list of numberApartments
    for (let i = 0; i <= 30; i++) {
        let option = document.createElement("option");
        option.innerHTML = i;
        let select_list = document.getElementById("Apartments");
        select_list.appendChild(option);
    }
    }


    
                                          
       


    
    let count = 0;
    
    function added() {  
            if(count > 0){
                return;
            }
            count++;
    
    let option = document.createElement("span");
    option.innerHTML = "Added Successfully!";
    option.style.backgroundColor = "#91E4FB";
    option.style.alignSelf = "center";
    
    let a_tag = document.createElement("a");
    a_tag.href = "index.php";
    a_tag.style.position = "absolute";
    a_tag.style.backgroundColor = "#91E4FB";
    a_tag.innerHTML = "Finish";
    a_tag.style.alignSelf = "end";
    a_tag.style.width = "80px";
    a_tag.style.height = "30px";
    a_tag.style.textDecoration = "none";
    a_tag.style.color = "black";
    
    
    
    let grid = document.getElementById("grid");
    grid.style.width = "400px";
    grid.style.height = "400px";
    grid.style.backgroundColor = "white";
    grid.style.borderRadius = "20px";
    grid.appendChild(option);
    grid.appendChild(a_tag);
    
    }                            
 
