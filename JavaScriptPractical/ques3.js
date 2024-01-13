function fun(a,b,c,d){
    if(a<b&&c>d)
    {
        console.log('a is smaller than b and c is greater than d');
    }
    if(a<b||c>d)
    {
        console.log('a is smaller than b or c is greater than d');
    }
    if(a!=c)
    {
        console.log('a isnot equals to c');
    }
}
const a=4;
const b=6;
const c=6;
const d=8;
fun(a,b,c,d);