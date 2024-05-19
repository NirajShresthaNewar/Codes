#include <stdio.h>
#include <stdlib.h>
#include <math.h>
float f( float x)
{
    float z;
    z=sqrt(1-x*x);
    return z;
}
int main()
{
    float x0,x1,x2,xn,h,v,n;
    printf("Enter the value of lower limit:\n");
    scanf("%f", &x0);
    printf("Enter the value of upper limit:\n");
    scanf("%f", &xn);
    n=3;
    h=(xn-x0)/n;
    x1=x0+h;
    x2=x0+2*h;
    v=(3*h/8)*(f(x0)+f(xn)+3*f(x1)+3*f(x2));
    printf("The value of integration is=%f", v);
    return 0;
}