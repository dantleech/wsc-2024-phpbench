# PHPBench TODO

- `config:initialize` command
- `config:new:generator` command

- `composer part1` etc. to checkout the project at various stages?

## Requirements

Hard:

- PHP 8.1
- Git

Soft:

- XDebug and KCachegrind

Preparation:

```
git clone https://github.com/dantleech/wsc-2024-phpbench`
composer install
```

## Workshop

2 hours

- Profile and compare code performance in a variety of scenarios
- Write custom reports in HTML and on the terminal

### Part 1

- **Introduction** 15m
	- PHPBench
	- Polish Calculator
- **Checkout the code and setup**: 15m
- **The lexer benchmark ("micro")**: 30m
	- Configuring PHPBench
	- Creating the benchmark class
	- Running the benchmark
	- Specifying Iteration and Revs
	- Retry threshold
	- Specifying `--report=aggregate`

Optional:

- **Param Providers**
    - Provide various expressions and compare the results

### Part 2

- **Compare and optimise**: 15m
    - Optimise the code!
- **Console Benchmark ("macro")**: 15m
	- Create abstract integration test case
	- Create application in SetUp
    - (optional) Xdebug Profiling
- **Advanced Reporting**: 15m
	- Output to HTML
	- Create a new report
	- Expressions
- **Assertions**: 15m

### Part Optional

- **Extending**
	- Create an extension
	- Register a command
