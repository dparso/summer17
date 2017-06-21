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

	while(true) {
		clock_t diff = clock() - start;
		double ratio = (double) diff / CLOCKS_PER_SEC;
		// every second, write data and call PHP script
		if(ratio >= 1) {
			cout << CLOCKS_PER_SEC << endl;
			cout << "msec is " << ratio << endl;
			start = clock();
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
