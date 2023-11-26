<?php
/*Write function makeParts or make_parts (depending on your language) that will take an array as argument and the size of the chunk.

Example: if an array of size 123 is given and chunk size is 10 there will be 13 parts, 12 of size 10 and 1 of size 3. */
function makeParts($arr, $chunkSize)
{
    var_dump(array_chunk($arr, $chunkSize)); //Lo imprime de una forma legible para los humanos.
}

makeParts([1, 2, 3, 4, 5, 6, 7, 8, 9, 10], 2);
