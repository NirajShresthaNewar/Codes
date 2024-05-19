#include <stdio.h>
#include <stdlib.h>
#include<math.h>
float f(float x)
{
    float z;
    z= sqrt(1-x*x);
    return z;
}
int main()
{
    float x0,xn,x1,k,h,term,v;
    printf("Enter the value of lower limit:\n");
    scanf("%f", &x0);
    printf("Enter the value of upper limit:\n");
    scanf("%f", &xn);
    printf("Enter the value of k:\n");
    scanf("%f", &k);
    term=f(x0)+f(xn);
    h=(xn-x0)/k;
    for(int i=1; i<k; i++)
    {
        if(i%2!=0)
        {
            term=term+4*f(x0+i*h);
        }
        else
        {
            term=term+2*f(x0+i*h);
        }
    }
    v=h/3*(term);
    printf("Root = %f\n", v);
    return 0;
}
