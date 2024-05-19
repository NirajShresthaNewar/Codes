#include <stdio.h>
#include <stdlib.h>
#include <math.h>
float f( float x)
{
    float z;
    z=x*x*x+2;
    return z;
}
int main()
{
    int a,b,k,i;
    float c,h,v;
    printf("Enter the value of lower limit\n");
    scanf("%d", &a);
     printf("Enter the value of upper limit\n");
    scanf("%d", &b);
    printf("Enter the value of k\n");
    scanf("%d", &k);
    h=(b-a)/k;
    c=f(a)+f(b);
    for (i=1; i<k; i++)
    {

        c=c+2*f(a+i*h);
    }
    v=h/2*(c);
    printf("The value of integration is= %f\n", v);
    return 0;
}

