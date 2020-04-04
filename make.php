<?php
echo "This is better make file\n";
//
// test that env is working here
//echo putenv("XDEBUG=1")."\n";
//echo putenv("PHP_XDEBUG=1")."\n";
//echo `env | grep -i XDEBUG`;
//


//clean everything
     `rm prog`;
     `rm build -rf`;
     `mkdir build`;

// build some object files     
     `g++ -c -o build/main.o main.cpp`;
     `g++ -c -o build/func.o func.cpp`;

//build static library 
     `g++ -c -o build/staticlib.o staticlib.cpp`;
     `ar rvs build/staticlib.a build/staticlib.o`;

//build shared library
     `g++ -c -fPIC sharedlib.cpp -o build/sharedlib.o`;
     `g++ -o build/sharedlib.so -shared build/sharedlib.o`;	     

     //link it all together
     $dir = __DIR__;
     `g++ -o build/prog build/main.o build/func.o build/staticlib.a {$dir}/build/sharedlib.so`;
     `ln -s build/prog prog`;

echo "finish\n";

