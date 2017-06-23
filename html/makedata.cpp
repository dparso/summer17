#include <cstdlib>
#include <iostream>
#include <fstream>
#include <climits>
#include <ctime>

using namespace std;

int main() {

	srand(time(NULL));

	ofstream myfile;

	clock_t start = clock();

	// sit in transmitting loop
	while(true) {
		clock_t diff = clock() - start;
		double ratio = (double) diff / CLOCKS_PER_SEC;
		// every second, write data and call PHP script
		if(ratio >= 1) {
			start = clock();
			// each time open is called, file contents are cleared
			myfile.open("data.txt");
			for(int i = 0; i < 10; i++) {
				double randNum = ((double) rand()) / INT_MAX; 
				myfile << randNum << "\n";
			}	

			myfile.close();
			system("php sqlconnect.php");
		}
	}	

	return 0;	
}
