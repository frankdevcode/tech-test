function characterFrequency(input) {
  const text = String(input ?? "").toLowerCase();

  const frequency = Object.create(null);
  for (const char of text) {
    if (!/\p{L}/u.test(char)) continue;
    frequency[char] = (frequency[char] ?? 0) + 1;
  }

  return frequency;
}

if (require.main === module) {
  const sample = "Hola, hola!! ¿Qué tal? ÁÉÍÓÚ áéíóú.";
  console.log(JSON.stringify({ input: sample, frequency: characterFrequency(sample) }, null, 2));
}

module.exports = { characterFrequency };

