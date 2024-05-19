#include<stdio.h>
#include<stdlib.h>
#include<math.h>
float f1(float x, float y, float z)
{
    return (z);
}
float f2(float x, float y, float z)
{
    return (exp(-x)-2*z-y);
}

int main()
{
   float x,y,z,x0,y0,z0,h,xp,n,ny,nz;
   int itr=0; 
   printf("Enter the initial value of x0,y0 and z0\n");
   scanf("%f%f%f",&x0,&y0,&z0);
   printf("Enter the functional value i.e xp:\n");
   scanf("%f",&xp);
   printf("Enter step size i.e h\n");
   scanf("%f",&h);
   x=x0;
   y=y0;
   z=z0;
   while(x<xp)
   {
    printf("\nIteration=%d\n x%d=%0.4f\t y%d=%0.4f\t z%d=%0.4f\t",(itr+1),itr,x,itr,y,itr,z);
    ny=y+f1(x,y,z)*h;
    nz=z+f2(x,y,z)*h;

    y=ny;
    z=nz;
    x=x+h;
    itr++;
    printf("y(%f)=%f\t z(%f)=%f\n", x,y,x,z);
   }
    printf("\n\n The value at y(%f)=%0.4f ",xp,y);
    return 0;
}