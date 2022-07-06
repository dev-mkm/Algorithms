# Algorithms
Strassen:
POST /index.php?m=Strassen
- data
FirstMatrix: Json Encoded Array of Array
SecondMatrix: Json Encoded Array of Array

Longest Common Subsequence:
POST /index.php?m=Lcs
- data
FirstString: The First String
SecondString: The Second String

JobSchedule:
POST /index.php?m=JobSchedule
- data
jobs: Json Encoded Array of the needed time for each job

Backtrack Knapsack
POST /index.php?m=Backtrack
- data
list: Json Encoded Array of prices and weights in following format: [{'w': 10, 'p': 20}, ...] where w is the int of weights and p is int of prices
max: int of max weight possible

BranchandBound Knapsack
POST /index.php?m=BranchandBound
- data
list: Json Encoded Array of prices and weights in following format: [{'w': 10, 'p': 20}, ...] where w is the int of weights and p is int of prices
max: int of max weight possible

DFS
POST /index.php?m=DFS
- data
graph: Json Encoded Array of Array (the matrix that represents the graph)

BellmanFord Shortest Path
POST /index.php?m=BellmanFord
- data
graph: Json Encoded Array of Array (the matrix that represents the graph)
start: int of The ID of starting vertex
