// script.js

document.addEventListener("DOMContentLoaded", () => {
    // Confirm deletion for links with class .btn-delete
    const deleteLinks = document.querySelectorAll(".btn-delete");
    deleteLinks.forEach(link => {
        link.addEventListener("click", (e) => {
            if (!confirm("Voulez-vous vraiment supprimer cet article ?")) {
                e.preventDefault();
            }
        });
    });
});

const canvas = document.getElementById("stars");
const ctx = canvas.getContext("2d");

canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

/* ---------- STARS ---------- */

let stars = [];

function createStar(){
    stars.push({
        x: Math.random()*canvas.width,
        y: Math.random()*canvas.height,
        size: Math.random()*2,
        color:`hsl(${Math.random()*360},100%,80%)`
    });
}

for(let i=0;i<120;i++){
    createStar();
}

/* ---------- BUTTERFLIES ---------- */

let butterflies = [];

function createButterfly(){
    butterflies.push({
        x: Math.random()*canvas.width,
        y: Math.random()*canvas.height,
        size: 6 + Math.random()*6,
        speedX:(Math.random()-0.5)*1.5,
        speedY:(Math.random()-0.5)*1.5,
        color:`hsl(${Math.random()*360},100%,70%)`,
        wing:Math.random()*Math.PI
    });
}

for(let i=0;i<25;i++){
    createButterfly();
}

function drawButterfly(b){

    ctx.save();
    ctx.translate(b.x,b.y);

    b.wing += 0.2;
    let wing = Math.sin(b.wing)*b.size;

    ctx.fillStyle=b.color;

    ctx.beginPath();
    ctx.ellipse(-wing,0,b.size,b.size*1.5,0,0,Math.PI*2);
    ctx.fill();

    ctx.beginPath();
    ctx.ellipse(wing,0,b.size,b.size*1.5,0,0,Math.PI*2);
    ctx.fill();

    ctx.fillStyle="black";
    ctx.fillRect(-1,-b.size,2,b.size*2);

    ctx.restore();
}

/* ---------- ANIMATION ---------- */

function animate(){

    ctx.clearRect(0,0,canvas.width,canvas.height);

    /* draw stars */
    stars.forEach(s=>{
        ctx.beginPath();
        ctx.arc(s.x,s.y,s.size,0,Math.PI*2);
        ctx.fillStyle=s.color;
        ctx.fill();
    });

    /* move butterflies */
    butterflies.forEach(b=>{

        b.x += b.speedX;
        b.y += b.speedY;

        if(b.x<0 || b.x>canvas.width) b.speedX*=-1;
        if(b.y<0 || b.y>canvas.height) b.speedY*=-1;

        drawButterfly(b);

    });

    requestAnimationFrame(animate);
}

animate();

/* ---------- RESIZE ---------- */

window.addEventListener("resize",()=>{
    canvas.width=window.innerWidth;
    canvas.height=window.innerHeight;
});