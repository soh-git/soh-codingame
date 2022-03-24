const n = parseInt(readline());
for (let i = 0; i < n; i++) {
    const card = readline();
    let creditcard=[];
    creditcard=card.replace(/\s+/g, '').split('');
    let creditcardver2=[]
    let creditcardver3=[]
    for (let i = creditcard.length-2; i>=0;){
        let num =parseInt(creditcard[i])*2;
        num=(""+num).length>1?num-9:num;
        creditcardver2.push(num);
        i=i-2
    }
    for (let i = creditcard.length-1; i>=0;){
        let num =parseInt(creditcard[i]);
   
        creditcardver3.push(num);
        i=i-2
    }


let sum=eval(creditcardver2.join('+')) + eval(creditcardver3.join('+'));


   if (sum%10==0) {
       console.log('YES')
   }else{
    console.log('NO')

   }
}


