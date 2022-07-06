# Algorithms
Strassen:<br>
POST /index.php?m=Strassen
-
FirstMatrix: Json Encoded Array of Array<br>
SecondMatrix: Json Encoded Array of Array

Longest Common Subsequence:<br>
POST /index.php?m=Lcs
- 
FirstString: The First String<br>
SecondString: The Second String

JobSchedule:<br>
POST /index.php?m=JobSchedule
- 
jobs: Json Encoded Array of the needed time for each job

Backtrack Knapsack<br>
POST /index.php?m=Backtrack
- 
list: Json Encoded Array of prices and weights in following format: [{'w': 10, 'p': 20}, ...] where w is the int of weights and p is int of prices<br>
max: int of max weight possible

BranchandBound Knapsack<br>
POST /index.php?m=BranchandBound
- 
list: Json Encoded Array of prices and weights in following format: [{'w': 10, 'p': 20}, ...] where w is the int of weights and p is int of prices<br>
max: int of max weight possible

DFS<br>
POST /index.php?m=DFS
- 
graph: Json Encoded Array of Array (the matrix that represents the graph)

BellmanFord Shortest Path<br>
POST /index.php?m=BellmanFord
- 
graph: Json Encoded Array of Array (the matrix that represents the graph)<br>
start: int of The ID of starting vertex
