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
		
		while((c = getopt(argc, argv, "n:p:")) != EOF) {
			switch (c) {
				case 'n':
					printf("Argument for option n is %s\n", optarg);
					network = optarg;
					firstProvided = 1;
					break;
				case 'p':
					printf("Argument for option p is %s\n", optarg);
					password = optarg;
					secondProvided = 1;
					break;
			}
		}
		
		if(firstProvided && secondProvided) {
			// avoid calling script with a null pointer
			char* command;
			printf("Executing command /bin/sh /var/www/html/switchmode.sh '%s' '%s'\n", network, password);
			asprintf(&command, "/bin/sh /var/www/html/switchmode.sh '%s' '%s'", network, password);
			printf("%s\n", command);
			system(command);
			free(command);
		}
	}

	return 0;
}

/*
	https://stackoverflow.com/questions/8532304/execute-root-commands-via-php
*/
