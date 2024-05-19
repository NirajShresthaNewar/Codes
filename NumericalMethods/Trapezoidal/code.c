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
    int x1,x2;
    float h,v;
    printf("Enter the value of lower limit\n");
    scanf("%d", &x1);
     printf("Enter the value of upper limit\n");
    scanf("%d", &x2);
    h=x2-x1;
    v=h/2*(f(x1)+f(x2));
    printf("The value of integration is= %f\n", v);
    return 0;
}
