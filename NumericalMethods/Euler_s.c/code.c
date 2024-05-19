#include <stdio.h>
#include <stdlib.h>
#include <math.h>
float f(float x,float y){
    float z;
    z=2*x+y;
    return z;
}

int main()
{
    float x,y,x0,y0,xp,h,i;
    int itr=0;
    printf("---------------Euler's method-------------\n---------------f(x)=2x+y-----------\n");
    printf("Enter the initial value of x and y:\n");
    scanf("%f%f",&x0,&y0);
    printf("Enter the step size (h)\n");
    scanf("%f",&h);
    printf("Enter the point to find value (i.e xp)\n");
    scanf("%f",&xp);
    x=x0;y=y0;
    while(x<xp){
        printf("Iteration= %d\nx%d=%0.4f\t y%d=%0.4f\n",(itr+1),itr,x,itr,y);
        y=y+h*f(x,y);
        x+=h;
        itr++;
    }
    printf("\n\n The value at y(%0.2f)=%0.4f\n",xp,y);
    return 0;
}