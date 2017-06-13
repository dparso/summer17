#include <stdlib.h>
#include <sys/types.h>
#include <unistd.h>
int main(int argc, char *argv[]) {
	setuid(0);
	/* WARNING: Only use an absolute path to the script to execute,
	 *	    a malicious user might fool the binary and execute
	 *	    arbitrary commands if not.
	 */
	system("/bin/sh /var/www/html/switchmode.sh");
	return 0;
}

/*
	https://stackoverflow.com/questions/8532304/execute-root-commands-via-php
*/
