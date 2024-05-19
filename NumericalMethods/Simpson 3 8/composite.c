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
    printf("the value of h is %f\n", h);
    for(int i=1; i<k; i++)
    {
        if(i%3!=0)
        {
            term=term+3*f(x0+i*h);
        }
        else
        {
            term=term+2*f(x0+i*h);
        }
    }
    v=(3*h/8)*(term);
    printf("Root = %f\n", v);
    return 0;
}
