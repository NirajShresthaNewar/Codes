#include<stdio.h>
#include<stdlib.h>
#include<math.h>
float f(float x)
{
    float z;
    z= sin(x)-2*x+1;
    return z;
}
int main()
{
    float x1, x2, x3;
    float e=0.05,Err=1;
    int itr=1;
    printf("Enter the value of x1 and x2:\n");
    scanf("%f%f", &x1, &x2);
    while(fabs(Err)>e)
    {
        x3=(x1*f(x2)-x2*f(x1))/(f(x2)-f(x1));
        Err=(x3-x2)/x3;
        x1=x2, x2=x3;
        printf("Iteration %d root = %0.4f Error=%0.4f\n", itr,x3,Err);
        itr++;
    }
    return 0;
}