#! bin/bash

branchname=$1

if [[ -n "$branchname" ]]; then
    echo "Attempt to switch to branch demo."
    git checkout demo
    echo "Attempting to merge $1 into branch demo."
    git merge $1
    echo "Attempting to push the changes made to branch demo."
    git push origin demo
    echo "Show state of current deployment."
    actions-cli
else
    echo "argument error"
fi
