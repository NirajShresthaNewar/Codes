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
    float x1,x2,xn,h,v,n;
    printf("Enter the value of lower limit:\n");
    scanf("%f", &x1);
    printf("Enter the value of upper limit:\n");
    scanf("%f", &xn);
    n=2;
    h=(xn-x1)/n;
    x2=x1+h;
    v=h/3*(f(x1)+4*f(x2)+f(xn));
    printf("The value of integration is=%f", v);
    return 0;

}

