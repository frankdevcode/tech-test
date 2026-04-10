function findLongestWord(input) {
  const text = String(input ?? "");

  const matches = text.matchAll(/\p{L}+(?:['-]\p{L}+)?/gu);

  let longest = "";
  for (const match of matches) {
    const word = match[0];
    if (word.length > longest.length) longest = word;
  }

  return { word: longest, length: longest.length };
}

if (require.main === module) {
  const samples = [
    "Hola, esto es una prueba técnica.",
    "Full-stack developer: PHP, JavaScript, jQuery, SQL.",
    "supercalifragilisticoespialidoso",
    "",
  ];

  for (const s of samples) {
    const result = findLongestWord(s);
    console.log(JSON.stringify({ input: s, ...result }));
  }
}

module.exports = { findLongestWord };

