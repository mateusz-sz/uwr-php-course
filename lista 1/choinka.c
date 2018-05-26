#include <stdio.h>
#include <stdlib.h>

int main()
{
  int wysokosc;

  scanf("%d", &wysokosc);

  for(int i = 0; i < wysokosc; i++ )
  {

    for (int j = 0; j <= i; j++ )
      printf( " *" );
    putchar( '\n' );
  }

  //printf( "%*c*\n", wysokosc + 1, ' ' );
  return 0;
}
