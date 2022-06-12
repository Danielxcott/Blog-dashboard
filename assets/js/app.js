$(".show-btn").click(function(){
    $(".aside").animate({marginLeft:0});
});
$(".close-btn").click(function(){
    $(".aside").animate({marginLeft:"-100%"})
});

function go(url){
    setTimeout(function(){
        location.href=`${url}`
    },500)
}

var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
  return new bootstrap.Popover(popoverTriggerEl)
})
let a = document.getElementsByClassName("a")
// let remove = document.querySelector("#remove");

let x = 8;
for(let i=0;i<=x;i++){
    $(".feather-trash-2").attr("id","remove");
}
$("table tbody").on("click","#remove",function(){
    $(this).closest("tr").remove();
})

$(".fullscreen-btn").on("click",function(){
    let current = $(this).closest(".card")
    current.toggleClass("maximize");
    if(current.hasClass("maximize") ){
        $(this).html("<i class=feather-minimize-2></i>")
    }else{
        $(this).html("<i class=feather-maximize-2></i>")
    }
})
$(document).ready(function() {
    $('#list').DataTable({
        "order":[[0,"desc"]]
    });
} );

// let screenheight = $(window).height();
// let currentheight = $(".nav-menu .active").offset().top;
// if(currentheight>screenheight*0.8){
//     $(".aside").animate({
//         scrollTop:currentheight-100
//     },1000)
// }
// console.log($(".nav-menu .active").offset().top)
// console.log(screenheight*0.8)

let btn = document.getElementById("submit");
let upload = document.querySelector("#photo");
let name = document.getElementById("name");
let type = document.getElementById("type");
let cate = document.getElementById("cate");
let subcate = document.getElementById("sub");
let quantity = document.getElementById("quantity")
let unit = document.getElementById("unit")
let price = document.getElementById("price")
let describe = document.getElementById("des")
let tbody = document.getElementById("tbody");
$("#submit").on("click",function(el){
    let name = document.getElementById("name");
    let type = document.getElementById("type");
    let cate = document.getElementById("cate");
    let subcate = document.getElementById("sub");
    let quantity = document.getElementById("quantity")
    let unit = document.getElementById("unit")
    let price = document.getElementById("price")
    let describe = document.getElementById("des")
    el.preventDefault();
    let namevalue = name.value;
    let typeselect = type.options[type.selectedIndex].innerText;
    let cateselect = cate.options[cate.selectedIndex].innerText;
    let subselect = subcate.options[subcate.selectedIndex].innerText;
    let q = quantity.value;
    let unitselect = unit.options[unit.selectedIndex].innerText;
    let p = price.value;
    let d = describe.value;
     let arr=[namevalue,typeselect,cateselect,subselect,q,unitselect,p,d]
    addtotr(arr);
    console.log("work")
});

function addtotr(x){
    let tr= document.createElement("tr");
    x.map(function(el){
        let td = document.createElement("td");
        let con = document.createTextNode(el)
        tr.appendChild(td);
        td.appendChild(con);
        $("#list #tbody").append(tr);
    })
    console.log("work")
};
// function newphoto(src){
//     let td = document.createElement("td");
//     let tr= document.createElement("tr");
//     let img = new Image();
//     img.src= src;
//     img.classList="img-size"
//     // addtotr(img);
//     $("#tbody").append(tr)
//     tr.appendChild(td);
//     td.appendChild(img);

// };
// $("#photo").change(function(){
//     let photo = this.files[0];
//     const reader = new FileReader();
//     reader.addEventListener("load",function(){
//         newphoto(reader.result);
//     });
//     reader.readAsDataURL(photo);
//     console.log(reader.result)
// })
   
