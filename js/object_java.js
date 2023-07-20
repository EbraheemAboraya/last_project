


window.onload = ()=>{
  floor_mobile();
  myFunction();
}








function myFunction() {
  for (let i =6;i>0; --i) {
  const view_box = document.createElement("div");
  view_box.style.display = "flex";
  view_box.style.flexDirection = "column";
  view_box.style.alignSelf = "end";
  view_box.style.marginBottom = "7px";
  view_box.style.position="absolute";
  view_box.style.alignSelf="end";
  view_box.style.borderRadius="4px";
  view_box.style.alignItem="center";
  view_box.style.fontSize="14px";
  view_box.style.width="70px";
  view_box.style.backgroundColor = "#91E4FB";

  view_box.style.height="25px";
  view_box.style.marginLeft = "24px";

  let a_tag = document.createElement("a");
  a_tag.href = "apartment.php";

  let floor_element_box = document.createElement("p");
  floor_element_box.innerHTML = "View" ;
  floor_element_box.style.marginLeft = "21px";
  floor_element_box.style.marginTop = "2px";
  a_tag.appendChild(floor_element_box);

  view_box.appendChild(a_tag);

  let new_floor = document.createElement("span");
  new_floor.style.height="65px";
  new_floor.style.borderRadius="8px";
  new_floor.style.backgroundColor="white";
  new_floor.style.marginTop="8px";
  new_floor.style.marginLeft="0px";
  new_floor.setAttribute("class","new_span_mobile");
  new_floor.style.display = "flex";

  let floor_element = document.createElement("p");
  floor_element.innerHTML = "Floor " + i;
  floor_element.style.marginLeft = "30px";
  floor_element.style.marginTop = "6px";

  new_floor.appendChild(floor_element);
  new_floor.appendChild(view_box);
  let select_list = document.getElementById("floor_media");
  select_list.appendChild(new_floor);
    }

}

function floor_mobile() {
  
  for (let i = 0; i < 5; i++) {

    let report_mobile = document.getElementById("report_mobile");

    let floor_house = document.createElement("span");
    floor_house.style.backgroundImage = "url('../images/house-small.png')";
    floor_house.style.width = "31px";
    floor_house.style.height = "33px";
    floor_house.style.marginTop = "2px";
    floor_house.style.left = "15px";
   
    let report_floor = document.createElement("span");
    report_floor.style.height = "21px";
    report_floor.style.width = "100px";
    report_floor.style.marginLeft = "40px";
    report_floor.style.marginTop = "14px";
    report_floor.style.fontFamily = "Inter";
    report_floor.style.fontStyle = "normal";
    report_floor.style.fontWeight = "400";
    report_floor.style.fontSize = "16px";
    report_floor.style.lineHeight = "22px";
    report_floor.innerHTML = "Floor " + [i+1];

    let floor_line = document.createElement("span");
    floor_line.style.width="260px";
    floor_line.style.height="0px";
    floor_line.style.marginLeft="12px";
    floor_line.style.top="528px";
    floor_line.style.border=" 1px solid #EBEBEB";
    floor_line.style.transform="rotate(0.07deg)";
    
    report_mobile.appendChild(floor_house);
    report_mobile.appendChild(report_floor);
    report_mobile.appendChild(floor_line);
}
}



