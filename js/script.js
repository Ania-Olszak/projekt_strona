let page_id=document.getElementById("page");

let el2=document.getElementById("uppertext");
let el3=document.getElementById("lowertext");
let el4=document.getElementById("highcontrast");
let el5=document.getElementById("normalcontrast");

let bann=document.getElementById("banner");
let nav=document.getElementById("nav");
let board1=document.getElementById("page__board1")
let board1_inside=document.getElementById("board1_inside");
let board1_box=document.getElementById("board1_box");
let board2=document.getElementById("board2");
let board2_inside1=document.getElementById("board2_inside1");
let board2_inside2=document.getElementById("board2_inside2");
let board2_inside3=document.getElementById("board2_inside3");
let page_a_inside1=document.getElementById("page__a--inside1");
let page_a_inside2=document.getElementById("page__a--inside2");
let page_a_inside3=document.getElementById("page__a--inside3");
let footer=document.getElementById("page__footer");

function upper()
{
        page_id.className="page page--upper";
}

function lower()
{
        page_id.className="page page--lower"  
}
function highcontrast()
{
        page_id.className="page page--wcag";
        nav.className="page__nav page__nav--wcag";
        bann.className="page__banner page__banner--wcag ";
        board1_inside.className="page__board1--inside shadow page__board1--wcag ";
        board1_box.className="page__board1--box  page__board1--wcag ";
        board2.className="page__board2 page__board2--wcag";
        board2_inside1.className="page__board2--inside1 page__board2--photo_wcag";
        board2_inside2.className="page__board2--inside2 page__board2--photo_wcag";
        board2_inside3.className="page__board2--inside3 page__board2--photo_wcag";
        page_a_inside1.className="page__a--wcag";
        page_a_inside2.className=" page__a--wcag";
        page_a_inside3.className=" page__a--wcag";
        footer.className="page__footer page__footer--wcag";
        board1.className="page__board1 page__board1--photo page__board1--photo_wcag";
}
    
function normalcontrast()
{
        page_id.className="page ";
        nav.className="page__nav ";
        bann.className="page__banner ";
        board1_inside.className="page__board1--inside shadow ";
        board1_box.className="page__board1--box  ";
        board2.className="page__board2 ";
        board2_inside1.className="page__board2--inside1";
        board2_inside2.className="page__board2--inside2 ";
        board2_inside3.className="page__board2--inside3 ";
        page_a_inside1.className="page__a--p";
        page_a_inside2.className=" page__a--p";
        page_a_inside3.className=" page__a--p";
        footer.className="page__footer ";
        board1.className="page__board1 page__board1--photo ";

}
    




el2.addEventListener("click",upper);
el3.addEventListener("click",lower);
el4.addEventListener("click",highcontrast);
el5.addEventListener("click",normalcontrast);


