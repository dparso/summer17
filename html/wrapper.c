#include <stdlib.h>
#include <sys/types.h>
#include <unistd.h>
#include <stdio.h>

int main(int argc, char *argv[]) {
	setuid(0);
	/* WARNING: Only use an absolute path to the script to execute,
	 *	    a malicious user might fool the binary and execute
	 *	    arbitrary commands if not.
	 */
	printf("There are %d arguments.\n", argc);
	if(argc > 1) {
		int c;
		char* network;
		char* password;
		int firstProvided = 0;
		int secondProvided = 0;
		int hostMode = 0;
		
		// parse command line for inputs
		// n: name (value of name), p: password (value of password)
		// h: host (flagged if switching to host mode, not client mode)
		while((c = getopt(argc, argv, "n:p:h")) != EOF) {
			switch (c) {
				case 'n':
					network = optarg;
					firstProvided = 1;
					break;
				case 'p':
					password = optarg;
					secondProvided = 1;
					break;
				case 'h':
					hostMode = 1;
					break;
			}
		}
		
		if(hostMode) {
			system("/bin/bash /var/www/html/hostmode.sh");			
		} else if(firstProvided && secondProvided) {
			// avoid calling script with a null pointer
			char* command;
			printf("Executing command /bin/bash /var/www/html/clientmode.sh '%s' '%s'\n", network, password);
			if (asprintf(&command, "/bin/bash /var/www/html/clientmode.sh '%s' '%s'", network, password)) {
				// execl instead?
				system(command);
				free(command);
			}
		}
	}

	return 0;
}

/*
	https://stackoverflow.com/questions/8532304/execute-root-commands-via-php
*/
