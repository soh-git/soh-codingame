
let allQ=[];
 const n = parseInt(readline());
 for (let i = 0; i < n; i++) {
     var inputs = readline().split(' ');
     const A = inputs[0];
     const xA = parseInt(inputs[1]);
     const yA = parseInt(inputs[2]);
     const B = inputs[3];
     const xB = parseInt(inputs[4]);
     const yB = parseInt(inputs[5]);
     const C = inputs[6];
     const xC = parseInt(inputs[7]);
     const yC = parseInt(inputs[8]);
     const D = inputs[9];
     const xD = parseInt(inputs[10]);
     const yD = parseInt(inputs[11]);
     let natureQ="quadrilateral";
     let para=false;
     let rhom=false;
     let square= false;
     let rect= false;
     let dAB= distance(xA,yA,xB,yB);
     let dBC= distance(xB,yB,xC,yC);
     let dCD= distance(xC,yC,xD,yD);
     let dDA= distance(xD,yD,xA,yA);
     let dAC= distance(xA,yA,xC,yC);
     let dBD= distance(xB,yB,xD,yD);
     if (dAB==dCD &&  dDA == dBC){para = true;natureQ="parallelogram"};
     if (dAB==dCD && dCD == dDA && dDA == dBC){rhom =true};
     if ( dAC==dBD ){rect= true;};
     if(rect && rhom){natureQ="square"};
     if(rect && !rhom) {natureQ="rectangle"};
     if(rhom && !rect) {natureQ="rhombus"};
     console.log(A+B+C+D+' is a '+natureQ+'.');
     
 }
 function distance(x1,y1,x2,y2){
 x=(x2-x1)*(x2-x1)
 y=(y2-y1)*(y2-y1)
 z=Math.sqrt(x+y)
 return z;
 }
