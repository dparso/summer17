#! /bin/bash
# check contents of command.txt, execute contents if not empty

command=$(bash -c 'curl -L https://turing.bowdoin.edu/~dparsons/software/command.txt')
echo $command



