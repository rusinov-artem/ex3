#include <iostream>

int version();

int static_lib_f();

int shared_lib_f();

int main(){

	std::cout << "hello world\n";	
	std::cout << version() << "\n";	
	std::cout << static_lib_f() << "\n";	
	std::cout << shared_lib_f() << "\n";	
	return 0;
}

