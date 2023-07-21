let arrow=document.querySelectorAll(".arrow");
  for(var i=0;i < arrow.length;i++){
    arrow[i].addEventListener("click", (e)=>{
      let arrowParent = e.target;
      arrowParent.classList.toggle("rotate")
    });
  }

  let sidebar=document.querySelector(".sidebar");
  let btnSidebar=document.querySelector(".btn-sidebar");
  btnSidebar.addEventListener("click", ()=>{
    sidebar.classList.toggle("hide");
    console.log(sidebar);
  });