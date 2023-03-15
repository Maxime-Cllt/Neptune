#!/bin/bash

count=0

count_files() {
  local dir=$1

  for file in "$dir"/*; do
    if [[ -d "$file" ]]; then
      count_files "$file"
    elif [[ -f "$file" ]]; then
      count=$(( count + 1 ))
    fi
  done
}


directory="."
total=0
for file in $(find "$directory" -type f); do
  lines=$(wc -l < "$file")
  total=$((total + lines))
done


count_files "."

echo "Total des lignes dans tous les fichiers : $total"
echo "Le nombre de fichiers dans le répertoire est: $count"