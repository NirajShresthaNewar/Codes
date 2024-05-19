#include <stdio.h>
#include <stdlib.h>
#include <math.h>
float f (float x, float y)
{
    return (2*x+y);
}
int main()
{
    float x,y,x0,y0,h,xp,m1,m2;
    int itr=0;
    printf("Enter initial values of x0 and y0:\n");
    scanf("%f%f",&x0,&y0);
    printf("Enter the value at which functional value is required i.e h:\n");
    scanf("%f",&h);
    printf("Enter the value of step size:\n");
    scanf("%f",&xp);
    x=x0;
    y=y0;
    while(x<xp)
    {
        printf("Iteration=%d\n x%d=%0.2f\t y%d=%0.2f\t",(itr+1),itr,x,itr,y);
        m1=f(x,y);
        m2=f(x+h,y+h*m1);
        y=y+(h/2)*(m1+m2);
        x=x+h;
        itr++;
        printf("m1=%0.2f\t m2=%0.2f\n",m1,m2);
    }
    printf("\n\n The value at y(%f)=%0.2f",xp,y);
    return 0;
}