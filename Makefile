install:
	composer install

brain-games:
	./bin/BrainGames

brain-even:
	./bin/BrainEven

brain-calc:
	./bin/BrainCalc

brain-gcd:
	./bin/BrainGcd

brain-progression:
	./bin/BrainProgression

brain-prime:
	./bin/BrainPrime

validate:
	composer validate

lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin
