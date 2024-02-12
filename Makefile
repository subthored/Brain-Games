install:
	composer install

brain-games:
	./bin/brain-games

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
